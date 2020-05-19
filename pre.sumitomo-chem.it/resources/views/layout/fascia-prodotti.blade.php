 <section class="product-bar_wrap">
    <div class="product-bar" data-magellan-target="mainContent">
        <div class="row">
            <ul class="list reset-list CategoriaProdotti">
                <li>
                  <a href="<?php echo url('categoria/insetticidi'); ?>" title="Insetticidi" class="insect @if($cat === 'insetticidi') active @endif">
                    <span class="icon-acaricide"></span>
                    <span>Insetticidi</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo url('categoria/fungicidi'); ?>" title="Fungicidi" class="fung @if($cat === 'fungicidi') active @endif">
                    <span class="icon-fungicide"></span>
                    <span>Fungicidi</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo url('categoria/erbicidi'); ?>" title="Erbicidi" class="herb @if($cat === 'erbicidi') active @endif">
                    <span class="icon-herbicide"></span>
                    <span>Erbicidi</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo url('categoria/vari'); ?>" title="Vari" class="var @if($cat === 'vari') active @endif">
                    <span class="icon-various"></span>
                    <span>Vari</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo url('categoria/biologico'); ?>" title="Agricoltura biologica" class="bio @if($cat === 'biologico') active @endif">
                    <span class="icon-bio-agri"></span>
                    <span>Agricoltura<br>Biologica</span>
                  </a>
                </li>
                <li id="catalogoSumitomo"></li>
                <li id="catalogoSiapa"></li>
                <li>
                  <a href="<?php echo url('prodotti#adversity'); ?>" title="Schede di difesa" class="sumitomoCatalogo">
                    <span class="icon-defense-board"></span>
                    <span>Schede<br>di difesa</span>
                  </a>
                </li>
            </ul>
        </div>
    </div>
</section>


