<footer class="fixed-bottom bg-dark text-white">
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between medium">
        <div class="text-muted">Copyright &copy; BuildenHome 2021</div>
        <div>
            <a href="#">Privacy Policy</a>
            &middot;
            <a href="#">Terms &amp; Conditions</a>
        </div>
    </div>
</div>
</footer>
<!-- JavaScript files-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('assets/lightbox2/js/lightbox.min.js') ?>"></script>
<script src="<?php echo base_url('assets/nouislider/nouislider.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-select/js/bootstrap-select.min.js') ?>"></script>
<script src="<?php echo base_url('assets/owl.carousel2/js/owl.carousel.min.js') ?>"></script>
<script src="<?php echo base_url('assets/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js') ?>"></script>
<script src="<?php echo base_url('assets/boutique/js/front.js') ?>"></script>
<script src="<?php echo base_url('assets/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/ajax/jquery.js') ?>"></script>

<!-- datepicker -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite - 
    //   see more here 
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }
    // this is set to BootstrapTemple website as you cannot 
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
</script>
<script>
    // Swal.fire({
    //     icon: 'error',
    //     title: 'Oops...',
    //     text: 'Something went wrong!',
    //     footer: '<a href>Why do I have this issue?</a>'
    // })
    var $flashData = $('.flash-data').data('flashdata');
    if ($flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Berhasil ' + $flashData,
        })
    }
</script>
<script>
    var search = document.getElementById('search_text');
    var container = document.getElementById('container');

    search.addEventListener('keyup', function() {

        //buat objek ajax
        var xhr = new XMLHttpRequest();

        //cek kesiapan ajax
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }
        //eksekusi ajax
        xhr.open('GET', '<?php echo base_url("service/page/cari") ?>?search=' + search.value, true);
        xhr.send();
    });
</script>



<script>
    $(document).ready(function() {
        $('#kota').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('pesan/form/kecamatan'); ?>",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_kec + '">' + data[i].nama_kec + '</option>';
                    }
                    $('#kecamatan').html(html);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // Ketika ada error          
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    // Munculkan alert error        

                }
            });
        });
    });
</script>

<script>
    $(function() {
        $("#datepicker").datepicker({
            minDate: moment().add('d', 1).toDate(),
        });
    });
</script>


<!-- Life Chat -->

<!-- Start of LiveChat (www.livechatinc.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 12959352;;
    (function(n, t, c) {
        function i(n) {
            return e._h ? e._h.apply(null, n) : e._q.push(n)
        }
        var e = {
            _q: [],
            _h: null,
            _v: "2.0",
            on: function() {
                i(["on", c.call(arguments)])
            },
            once: function() {
                i(["once", c.call(arguments)])
            },
            off: function() {
                i(["off", c.call(arguments)])
            },
            get: function() {
                if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                return i(["get", c.call(arguments)])
            },
            call: function() {
                i(["call", c.call(arguments)])
            },
            init: function() {
                var n = t.createElement("script");
                n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
            }
        };
        !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
    }(window, document, [].slice))
</script>
<noscript><a href="https://www.livechatinc.com/chat-with/12959352/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</div>
</body>

</html>