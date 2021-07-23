window.addEventListener('load', () => {
    const $headerInfo = document.getElementsByClassName('header-info')[0];
    const $headerInfoStyle = getComputedStyle($headerInfo, null);

    const $headerLink = document.getElementsByClassName('header-link')[0];
    const $headerLinkStyle = getComputedStyle($headerLink, null);

    const $headerTitle = document.getElementsByClassName('header-title')[0];

    $headerTitle.style.width =  parseInt($headerInfoStyle.getPropertyValue('width')) -
                                parseInt($headerLinkStyle.getPropertyValue('width')) -
                                parseInt($headerLinkStyle.getPropertyValue('margin-right')) +
                                'px';
    $headerTitle.style.whiteSpace = 'nowrap';
    $headerTitle.style.overflow = 'hidden';
    $headerTitle.style.textOverflow = 'ellipsis'

    console.log(parseInt($headerLinkStyle.getPropertyValue('margin-right')));
})
