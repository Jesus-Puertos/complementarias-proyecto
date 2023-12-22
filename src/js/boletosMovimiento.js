const ticketElms = document.querySelectorAll(".boleto");

function handleMouseMove(e) {
  const { x, y, width, height } = this.getBoundingClientRect();
  const centerPoint = {
    x: x + width / 2,
    y: y + height / 2,
  };

  const degreeX = (e.clientY - centerPoint.y) * 0.008;
  const degreeY = (e.clientX - centerPoint.x) * -0.008;

  this.style.transform = `
    perspective(1000px)
    rotateX(${degreeX}deg)
    rotateY(${degreeY}deg)
  `;
}

ticketElms.forEach((ticketElm) => {
  if (innerWidth > 768) {
    ticketElm.addEventListener("mousemove", handleMouseMove);
  }
});

document.addEventListener("visibilitychange", function () {
  if (document.hidden) {
    ticketElms.forEach((ticketElm) => {
      ticketElm.removeEventListener("mousemove", handleMouseMove);
    });
  } else {
    ticketElms.forEach((ticketElm) => {
      if (innerWidth > 768) {
        ticketElm.addEventListener("mousemove", handleMouseMove);
      }
    });
  }
});
