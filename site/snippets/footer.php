    <?php snippet('utilities/admin-edit') ?>
    <script>
      function shimport(src) {
        try {
          new Function('import("' + src + '")')();
        } catch (e) {
          var s = document.createElement('script');
          s.src = 'https://unpkg.com/shimport@2.0.4/index.js';
          s.dataset.main = src;
          document.head.appendChild(s);
        }
      }
      shimport('/assets/js/main.js');
    </script>
    <script src="https://unpkg.com/lazysizes@5.2.2/lazysizes.min.js"></script>
    <script src="https://unpkg.com/lazysizes@5.2.2/plugins/unveilhooks/ls.unveilhooks.min.js"></script>
</body>
</html>
