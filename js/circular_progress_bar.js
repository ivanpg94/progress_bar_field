document.addEventListener('DOMContentLoaded', function() {
  const circles = document.querySelectorAll('.circle');
  circles.forEach(circle => {
    const radius = circle.r.baseVal.value;
    const circumference = radius * 2 * Math.PI;

    circle.style.strokeDasharray = `${circumference} ${circumference}`;
    circle.style.strokeDashoffset = `${circumference}`;

    const percentage = parseInt(circle.getAttribute('stroke-dasharray').split(',')[0], 10);
    const offset = circumference - percentage / 100 * circumference;
    circle.style.strokeDashoffset = offset;
  });
});
