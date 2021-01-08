  <footer class="footer container">
    <hr>
    <p class="footer__text">
      Scandiweb Test Assignment
    </p>
  </footer>
  <?php
  use App\Helpers\AssetManager;

  AssetManager::load(
    ['/product/list'],
    ['<script src="/assets/js/index.min.js"></script>']
  );
  ?>
</body>
</html>