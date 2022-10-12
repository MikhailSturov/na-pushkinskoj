<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url('/') ); ?>">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" viewBox="0 0 24 24"
            stroke-width="1" stroke="#7d7d7d" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <circle cx="10" cy="10" r="7" />
        <line x1="21" y1="21" x2="15" y2="15" />
    </svg>
    <label>
        <span class="screen-reader-text">Найти:</span>
        <input type="search" id="searchinput" class="search-field search-input" placeholder="Поиск по сайту" value="" name="s">
    </label>
</form>