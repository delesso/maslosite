document.getElementById('addToCartBtn').addEventListener('click', function() {
    const notification = document.getElementById('notification');
    
    // Показываем уведомление
    notification.classList.add('show');
    
    // Через 3 секунды скрываем уведомление
    setTimeout(function() {
        notification.classList.remove('show');
    }, 3000);
});
document.addEventListener('DOMContentLoaded', function() {
    const loginLink = document.querySelector('.store-menu__item-inner');
    const modal = document.getElementById('authModal');
    const closeBtn = document.querySelector('.close');
    const tabBtns = document.querySelectorAll('.tab-btn');
    const authForms = document.querySelectorAll('.auth-form');
    
    // Открытие модального окна при клике на "Войти"
    loginLink.addEventListener('click', function(e) {
      e.preventDefault();
      modal.style.display = 'block';
    });
    
    // Закрытие модального окна
    closeBtn.addEventListener('click', function() {
      modal.style.display = 'none';
    });
    
    // Закрытие при клике вне модального окна
    window.addEventListener('click', function(e) {
      if (e.target === modal) {
        modal.style.display = 'none';
      }
    });
    
    // Переключение между вкладками
    tabBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        tabBtns.forEach(b => b.classList.remove('active'));
        authForms.forEach(form => form.classList.remove('active'));
        
        this.classList.add('active');
        const tabId = this.getAttribute('data-tab');
        document.getElementById(tabId).classList.add('active');
      });
    });
  });
  