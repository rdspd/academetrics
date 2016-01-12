<div class='header'></div>
<ul class='navigation'>
    <li class='bordered'>
        <a href='/'>academetrics</a>
    </li>
    <li>
        <a href='/students'>students</a>
    </li>
    <li>
        <a href='/subjects'>subjects</a>
    </li>
    <?php if( isset( $_SESSION['urole'] ) && 3 == $_SESSION['urole'] ) : ?>
    <li>
        <a href='/profile'>profile</a>
    </li>
    <?php endif; ?>
    <li class='right-aligned'>
    <?php if( isset( $_SESSION['uname'] ) ) : ?>
        Hello, <strong><?php echo $_SESSION['uname']; ?></strong>. (<a href='/logout'>logout</a>)
    <?php else : ?>
    <a href='/login'>login</a>
    <?php endif; ?>
    </li>
</ul>