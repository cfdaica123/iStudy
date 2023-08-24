/* eslint-disable jsx-a11y/anchor-is-valid */
import React, { useState } from "react";
import "./navbar.css";
import { MdTravelExplore } from "react-icons/md";
import { IoCloseOutline } from "react-icons/io5";
import { PiDotsThreeOutlineLight } from "react-icons/pi";

export const Navbar = () => {
  const [active, setActive] = useState("navBar");
  //function to toggle navbar
  const showNav = ()=>{
    setActive('navBar activeNavbar')
  }
  //function to remove navbar
  const removeNavbar = ()=>{
    setActive('navBar')
  }

  return (
    <section className="navBarSection">
      <header className="header flex">
        <div className="logoDiv">
          <a href="#" className="logo flex">
            <h1>
              <MdTravelExplore className="icon" /> TravelNest.
            </h1>
          </a>
        </div>

        <div className={active}>
          <ul className="navList flex">
            <li className="navItem">
              <a href="#Home" className="navLink">
                Home
              </a>
            </li>
            <li class="navItem">
              <a href="#aboutUs" class="navLink">
                About Us
              </a>
            </li>
            <li class="navItem">
              <a href="#services" class="navLink">
                Services
              </a>
            </li>
            <li class="navItem">
              <a href="#contactUs" class="navLink">
                Contact Us
              </a>
            </li>
            <button className="btn">
              <a href="#">Book Now</a>
            </button>
          </ul>
          <div onClick={removeNavbar} className="closeNavBar">
            <IoCloseOutline className="icon" />
          </div>
        </div>

        <div onClick={showNav} className="toggleNavbar">
          <PiDotsThreeOutlineLight className="icon" />
        </div>
      </header>
    </section>
  );
};

export default Navbar;