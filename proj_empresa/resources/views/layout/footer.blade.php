<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<section class="footer">
    <footer  class="container footer-config">
        <div class="row">
            <div class="col-md-4">
              <div class=""><img src="{{ asset('img/logoaisa.png') }}" alt=""></div>
            </div>
            <div class="col-md-4 ">
              <div class="">Technologies</div>
              <p>PHP</p>
              <p>Laravel</p>
              <p>Bootstrap</p>
              <p>Composer</p>
            </div>
            <div class="col-md-4">
              <div class="">Social Medias</div>
              <a href=""><img src="" alt=""> </a>
            </div>
          </div>

        <div class="row">
            <div class="col-md-4 ">
              <div >Developed by Vitor Augusto. Just a fictional petshop website made in honor of my dogs</div>
            </div>
            <div class="col-md-4">
              <div class="">Documentation</div>
              <p> <a href="https://www.php.net/docs.php">PHP</a></p>
              <p><a href="https://laravel.com/docs/10.x">Laravel</a></p>
              <p><a href="https://getbootstrap.com/docs/5.3/getting-started/introduction/">Bootstrap</a></p>
              <p><a href="https://getcomposer.org/doc/">Composer</a></p>
            </div>
            <div class="col-md-4">
              <div class=""></div>
            </div>
        </div>

    </footer>
</section>



<script>
    $(function() {
        $('#vitor').DataTable({
            "paging": true,
            "lenghtChange": true,
            "searching": true,
            "ordering": true,
            "info":true,
            "autoWidth": false,
            "responsive": true,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
            }

        });
    })

    $(function() {
        $('#grid').DataTable({
            "paging": false,
            "lenghtChange": false,
            "searching": true,
            "ordering": true,
            "info":false,
            "autoWidth": false,
            "responsive": true,
            "language": {
               "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
            }

        });
    })
</script>
