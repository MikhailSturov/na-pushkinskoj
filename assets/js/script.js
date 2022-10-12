"use strict";

const navMain = document.querySelector('.main-nav');
const navToggle = document.querySelector('.main-nav__toggle');

navMain.classList.remove('main-nav--nojs');
navMain.classList.add('main-nav--closed');

navToggle.addEventListener('click', function () {
  if (navMain.classList.contains('main-nav--closed')) {
    navMain.classList.remove('main-nav--closed');
    navMain.classList.add('main-nav--opened');
  } else {
    navMain.classList.add('main-nav--closed');
    navMain.classList.remove('main-nav--opened');
  }
});

const sideNav = document.querySelector('.side-nav');

if (sideNav) {
  const sideNavToggle = document.querySelector('.side-nav__toggle');

  sideNav.classList.remove('side-nav--nojs');
  sideNav.classList.add('side-nav--closed');

  sideNavToggle.addEventListener('click', function () {
    if (sideNav.classList.contains('side-nav--closed')) {
      sideNav.classList.remove('side-nav--closed');
      sideNav.classList.add('side-nav--opened');
    } else {
      sideNav.classList.add('side-nav--closed');
      sideNav.classList.remove('side-nav--opened');
    }
  });
}
