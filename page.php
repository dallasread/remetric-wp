<div class="wrap" style="padding-top: 10px;">
    <div id="remetric-admin">
        <p>Loading Remetric...</p>
    </div>
</div>

<script type="text/javascript">
    window.afterRemetricRegister = function(user) {
        jQuery.post(window.ajaxurl, {
            action: 'remetric_save_keys',
            remetric_access_token: user.access_token,
            remetric_publishable_key: user.publishable_key,
        });
    }
</script>

<script type="text/javascript">
    (function(a, d, m, i, n) {
        n = document.createElement('script'); n.type = 'text/javascript'; n.async = true;
        n.setAttribute('data-publishable-key', a);
        n.setAttribute('data-access-token', d);
        n.setAttribute('data-css', '<?php echo str_replace('.js', '.css', $remetricAdminUrl); ?>');
        n.setAttribute('data-base-url', '<?php echo $remetricApiUrl; ?>');
        n.src = '<?php echo $remetricAdminUrl; ?>';
        i = document.getElementsByTagName('script')[0];
        i.parentNode.insertBefore(n, i);
    })('<?php echo $remetric_publishable_key; ?>', '<?php echo $remetric_access_token; ?>');
</script>
