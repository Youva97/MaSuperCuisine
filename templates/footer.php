<?php
require_once('library/recipe-config.php');
?>
<footer class="py-5">
  <div class="row">
    <?php foreach ($tableSections as $key => $tableSection) : ?>
      <div class="col-6 col-md-2 mb-3">
        <h5><?= $tableSection ?></h5>
        <ul class="nav flex-column">
          <?php foreach ($tableNavLinks as $link => $name) : ?>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link p-0 text-body-secondary"><?= $name ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>

    <!-- Ceci a été déplacé à l'extérieur de la première 'row' -->
    <div class="col-5 col-md-5 offset-md-1 mb-3">
      <form>
        <h5>Subscribe to our newsletter</h5>
        <p>Monthly digest of what's new and exciting from us.</p>
        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
          <label for="newsletter1" class="visually-hidden">Email address</label>
          <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
          <button class="btn btn-primary" type="button">Subscribe</button>
        </div>
      </form>
    </div>
  </div>

  <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
    <p>© 2023 Company, Inc. All rights reserved.</p>
    <ul class="list-unstyled d-flex">
      <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
            <use xlink:href="#twitter"></use>
          </svg></a></li>
      <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
            <use xlink:href="#instagram"></use>
          </svg></a></li>
      <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
            <use xlink:href="#facebook"></use>
          </svg></a></li>
    </ul>
  </div>
</footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>