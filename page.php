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
    (function(r, e, m, e, t, r, i, c) {
        c = document.createElement('script');
        c.type = 'text/javascript';
        c.async = true;
        c.setAttribute('data-publishable-key', r);
        c.setAttribute('data-access-token', e);
        c.src = m;
        c.setAttribute('data-base-url', e);
        c.setAttribute('data-css', t);
        i = document.getElementsByTagName('script')[0];
        i.parentNode.insertBefore(c, i);
    })(
        '<?php echo $remetric_publishable_key; ?>',
        '<?php echo $remetric_access_token; ?>',
        '<?php echo $remetric_admin_url; ?>',
        '<?php echo $remetric_api_url; ?>',
        '<?php echo str_replace('.js', '.css', $remetric_admin_url); ?>'
    );
</script>

<?php require_once 'marketing.php'; ?>
