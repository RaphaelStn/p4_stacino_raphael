<?php  // On init l'instance unique App via function static et singleton, stocké dans $app. $app nous permet d'appeler les différentes tables selon leur nom (billet, comm).
$app=App::getInstance();
$app -> setTitle("A propos");
?>

<section id="blog" class="main">
<h1> A propos de Jean Forteroche</h1>
<p>
    Fusce massa quam, elementum sit amet cursus dictum, tempus vel purus. Suspendisse a dui nunc. Vestibulum eget sodales mauris. 
    Nulla pulvinar nunc ac pulvinar placerat. Phasellus nec orci dui. Sed ullamcorper tincidunt ligula, eget rutrum purus vestibulum sit amet. 
    Sed at viverra nulla. Sed lacus velit, finibus vel pretium ut, pulvinar in lacus. Integer ornare porta arcu, at egestas arcu sollicitudin at. 
    Quisque quis metus finibus, porttitor ligula malesuada, efficitur felis. Fusce ut urna eu ex pulvinar condimentum. Praesent ac nisl massa. Praesent
    vehicula pulvinar metus, vitae sollicitudin ligula aliquet quis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
    curae; Proin cursus enim nec justo eleifend, nec aliquam massa porta. Nam ac tortor metus.
    Etiam ultrices rutrum est, eu vehicula felis sollicitudin ut. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
    Pellentesque nulla nibh, sollicitudin at ultricies ut, pellentesque ut leo. Sed id commodo mauris, vitae porta lectus. Fusce ultricies vehicula urna, 
    sed fringilla neque ultricies vel. Aliquam varius leo ut odio euismod gravida. Phasellus pellentesque laoreet dui vitae bibendum. Donec tincidunt nisi 
    sit amet nisi tempus placerat. Phasellus in nisl tellus.
</p>
</section>