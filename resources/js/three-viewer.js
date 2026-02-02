import * as THREE from 'three';
import html2canvas from 'html2canvas';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';

// ===== HTML CANVAS → TEXTURE =====
const canvas = document.createElement('canvas');
canvas.width = 1024;
canvas.height = 600;
const ctx = canvas.getContext('2d');

const texture = new THREE.CanvasTexture(canvas);
const screenMaterial = new THREE.MeshBasicMaterial({ map: texture });

// update canvas dari HTML
async function updateScreen() {
  const htmlEl = document.getElementById('html-content');
  if (!htmlEl) return;

  const htmlCanvas = await html2canvas(htmlEl, { backgroundColor: null });

  canvas.width = htmlCanvas.width;
  canvas.height = htmlCanvas.height;

  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(htmlCanvas, 0, 0, canvas.width, canvas.height);

  texture.needsUpdate = true;
}

// initial + live update
updateScreen();
setInterval(updateScreen, 1000);

// ===== SETUP THREE.JS =====
const container = document.getElementById('three-canvas');

const scene = new THREE.Scene();
scene.background = null;

const camera = new THREE.PerspectiveCamera(45, 1, 0.1, 100);
camera.position.set(0, 0.8, 3);

const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
renderer.setPixelRatio(window.devicePixelRatio);
container.appendChild(renderer.domElement);

function resize() {
  const w = container.clientWidth;
  const h = container.clientHeight;
  camera.aspect = w / h;
  camera.updateProjectionMatrix();
  renderer.setSize(w, h);
}
resize();
window.addEventListener('resize', resize);

scene.add(new THREE.AmbientLight(0xffffff, 0.9));
const dir = new THREE.DirectionalLight(0xffffff, 1);
dir.position.set(3, 5, 2);
scene.add(dir);

const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true;
controls.dampingFactor = 0.08;
controls.enableZoom = false;
controls.enablePan = false;
controls.target.set(0, 0, 0);
controls.update();

// ===== DEFAULT STATE =====
let DEFAULT_CAMERA_POS = new THREE.Vector3();
let DEFAULT_TARGET = new THREE.Vector3();

let isUserInteracting = false;
let idleTimer = null;
const IDLE_DELAY = 500;

controls.addEventListener('start', () => {
  isUserInteracting = true;
  if (idleTimer) clearTimeout(idleTimer);
});

controls.addEventListener('end', () => {
  isUserInteracting = false;
  idleTimer = setTimeout(startReturnAnimation, IDLE_DELAY);
});

function frameModel(model, offset = 1.4) {
  const box = new THREE.Box3().setFromObject(model);
  const size = box.getSize(new THREE.Vector3());
  const center = box.getCenter(new THREE.Vector3());

  const maxDim = Math.max(size.x, size.y, size.z);
  const fov = camera.fov * (Math.PI / 180);
  const cameraZ = Math.abs(maxDim / Math.tan(fov / 2)) * offset;

  camera.position.set(center.x, center.y + maxDim * 0.15, cameraZ);
  controls.target.copy(center);
  controls.update();
}

function startReturnAnimation() {
  const startPos = camera.position.clone();
  const startTarget = controls.target.clone();
  const duration = 0.6;
  let startTime = null;

  function animateReturn(time) {
    if (!startTime) startTime = time;
    const t = Math.min((time - startTime) / (duration * 1000), 1);
    const ease = t * t * (3 - 2 * t);

    camera.position.lerpVectors(startPos, DEFAULT_CAMERA_POS, ease);
    controls.target.lerpVectors(startTarget, DEFAULT_TARGET, ease);
    controls.update();

    if (t < 1) requestAnimationFrame(animateReturn);
  }

  requestAnimationFrame(animateReturn);
}

// ===== MODELS =====
const loader = new GLTFLoader();
const devices = {};

const DEVICE_CONFIG = {
  desktop: { offset: 0.6, rotation: [0, Math.PI * -2.5, 0], screenSize: [0.6, 0.35], screenPos: [0, 0.15, 0] },
  tablet: { offset: 0.7, rotation: [Math.PI * -7.5, 0, 0], screenSize: [0.5, 0.3], screenPos: [0, 0.12, 0] },
  mobile: { offset: 0.6, rotation: [0, Math.PI * -5, 0], screenSize: [0.35, 0.6], screenPos: [0, 0.18, 0] }
};

function createScreenMesh(width, height) {
  const geo = new THREE.PlaneGeometry(width, height);
  const mesh = new THREE.Mesh(geo, screenMaterial);
  return mesh;
}

function loadDevice(name, path) {
  loader.load(path, (gltf) => {
    const model = gltf.scene;
    const cfg = DEVICE_CONFIG[name];

    normalizeModel(model, 1);
    model.rotation.set(...cfg.rotation);
    model.userData.defaultRotation = model.rotation.clone();
    model.visible = false;
    scene.add(model);
    devices[name] = model;

    // attach screen mesh
    const screenMesh = createScreenMesh(cfg.screenSize[0], cfg.screenSize[1]);
    screenMesh.position.set(0, 0.3, 0.5); // adjust sesuai model
    screenMesh.rotation.set(0, 1.6, 0);     // pastikan menghadap kamera

    model.add(screenMesh);

    if (name === 'desktop') showDevice('desktop');
  });
}

loadDevice('desktop', '/assets/3D/laptop.glb');
loadDevice('tablet', '/assets/3D/tablet.glb');
loadDevice('mobile', '/assets/3D/phone.glb');

function normalizeModel(model, targetSize = 1) {
  const box = new THREE.Box3().setFromObject(model);
  const size = new THREE.Vector3();
  box.getSize(size);
  const maxAxis = Math.max(size.x, size.y, size.z);
  const scale = targetSize / maxAxis;
  model.scale.setScalar(scale);

  box.setFromObject(model);
  const center = new THREE.Vector3();
  box.getCenter(center);
  model.position.sub(center);
}

// ===== SHOW DEVICE =====
function showDevice(name) {
  Object.values(devices).forEach(m => m.visible = false);
  const model = devices[name];
  if (!model) return;

  model.visible = true;
  model.rotation.copy(model.userData.defaultRotation);

  const { offset } = DEVICE_CONFIG[name];
  frameModel(model, offset);

  DEFAULT_CAMERA_POS.copy(camera.position);
  DEFAULT_TARGET.copy(controls.target);
}

// ===== BUTTON =====
document.querySelectorAll('.device-btn').forEach(btn => {
  btn.addEventListener('click', () => showDevice(btn.dataset.device));
});

// ===== LOOP =====
function animate() {
  requestAnimationFrame(animate);
  controls.update();
  renderer.render(scene, camera);
}
animate();
