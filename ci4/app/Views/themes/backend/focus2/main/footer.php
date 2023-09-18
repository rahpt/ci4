<script src="<?= site_url('themes/focus2/vendor/toastr/js/toastr.min.js'); ?>"></script>
<script src="<?= site_url('themes/focus2/vendor/timeago/jquery.timeago.js'); ?>"></script>
<script src="<?= site_url('themes/focus2/vendor/timeago/locales/jquery.timeago.'.langJS().'.js'); ?>"></script>
<script>
    "use strict";
    $(document).ready(function () {
        let time_ago  = document.getElementsByClassName("timeAgo");
        for (let i = 0; i < time_ago.length; i++) {
            time_ago[i].innerText = jQuery.timeago(time_ago[i].innerText)
        }
    });
</script>
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed by <a href="https://partner4dev.com/" target="_blank">PArtner4Dev</a> &amp; Developed by <a href="https://p4d.pt/" target="_blank">P4D Design</a> - WebGuard v<?=version()?> </p>
    </div>
</div>
</div>
</body>
</html>