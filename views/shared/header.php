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
    <li class='right-aligned'>
    <?php if( isset( $_SESSION['uname'] ) ) : ?>
        Hello, <?php echo $_SESSION['uname']; ?>. (<a href='/'>logout</a>)
    <?php else : ?>
    <?php endif; ?>    
        <a href='/login'>login</a>
    </li>
</ul>