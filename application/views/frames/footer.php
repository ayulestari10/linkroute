<style type="text/css">
    #footer {
        background: url(<?= base_url('assets/img/header.png') ?>) no-repeat bottom center scroll;
        /*background-size: contain;*/
        background-size: 1400px;
        border-color: #FD7F04;
        color: black;
        height: 6%;
        padding-top: 3%;
        padding-bottom: 2%;
        margin-top: 20%;
    }
</style>
    <footer id="footer">
        <div class="container">
            <div class="pull-left">     
                &copy; BEM KM Fasilkom Unsri 2016
            </div>
            <div class="pull-right">
                Created by PTI BEM KM Fasilkom Unsri
            </div>  
        </div>
    </footer>
    <script type="text/javascript">
        var docHeight = $(window).height();
        var footerHeight = $('#footer').height();
        var footerTop = $('#footer').position().top + footerHeight;

        if (footerTop < docHeight) {
            $('#footer').css('margin-top', (docHeight - footerTop - 15) + 'px');
        }
    </script>       

	<!-- Theme Grayscale JavaScript -->
    <script src="<?= base_url('assets/js/grayscale.min.js') ?>"></script>

    <!-- Theme Freelancer JavaScript -->
    <script src="<?= base_url('assets/js/freelancer.min.js') ?>"></script>

</body>
</html>