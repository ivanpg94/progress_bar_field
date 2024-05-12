document.addEventListener('DOMContentLoaded', function() {
  const bars = document.querySelectorAll('.progress-bar');
  bars.forEach(bar => {
    bar.style.width = bar.getAttribute('data-percentage') + '%';
  });
});
