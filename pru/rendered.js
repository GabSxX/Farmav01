const wrapper = document.querySelector('.scroll-wrapper');
const el = document.querySelector('.scroll');
const filler = document.querySelector('.scroll-filler');
const position = document.querySelector('.scroll-position-inner');
const inner = document.querySelector('.scroll-inner');
const btns = {prev: document.querySelector('.scroll-btn.prev'), next: document.querySelector('.scroll-btn.next')};

const lerp = (a, b, n) => {
  return (1 - n) * a + n * b
}

const padding = 20;

let scrollNow = 0;

filler.style.width = inner.offsetWidth + padding*2 + 'px';
position.style.width = wrapper.offsetWidth / (inner.offsetWidth + padding*2) * 100 + '%';

const offset = 150;
const angle = 25;
const z = 15;

function render() {
  let now = lerp(scrollNow, wrapper.scrollLeft, .15);
  gsap.set(el, {x: -now});
  gsap.set(position, {x: now / wrapper.offsetWidth * 100 + '%'});

  document.querySelectorAll('.scroll-item').forEach(item => {
    let elPos = item.offsetLeft + item.offsetWidth / 2 - scrollNow;

    if (elPos > wrapper.offsetWidth - offset) {
      let q = (wrapper.offsetWidth - elPos) / offset;
      gsap.set(item, {rotateY: -(angle - q * angle), z: z - z * q})
    } else if (elPos < offset) {
      let q = elPos / offset;
      gsap.set(item, {rotateY: angle - q * angle, z: z - z * q})
    } else {
      gsap.set(item, {rotateY: 0, z: 0});
    }
  });

  scrollNow = now;

  if (wrapper.scrollLeft === 0) btns.prev.disabled = true
  else if (inner.offsetWidth - wrapper.scrollLeft === wrapper.offsetWidth - padding*2) btns.next.disabled = true
  else {btns.prev.disabled = false; btns.next.disabled = false;}
  requestAnimationFrame(render);
}

render();

function nextBtn() {
  wrapper.scrollLeft += document.querySelector('.scroll-item').offsetWidth*2 - 20;
}
function prevBtn() {
  wrapper.scrollLeft -= document.querySelector('.scroll-item').offsetWidth*2 - 20;
}