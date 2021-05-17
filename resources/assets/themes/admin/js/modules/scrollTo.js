
const scrollToEl = (el, offset = 150) => {
    const elRect = el.getBoundingClientRect();
    window.scrollTo({
        top: window.pageYOffset + elRect.y - offset,
        left: 0,
        behavior: 'smooth'
    });
}

export default scrollToEl;
