/* eslint-disable jsx-a11y/anchor-is-valid */
import React, { useEffect } from "react";
import "./footer.css";
import video2 from "../../Assets/video (2).mp4";
import { FiSend } from "react-icons/fi";
import { MdTravelExplore } from "react-icons/md";
import { BiLogoFacebookCircle } from "react-icons/bi";
import { AiFillInstagram } from "react-icons/ai";
import { FcReddit } from "react-icons/fc";
import { AiFillTwitterCircle } from "react-icons/ai";
import { AiOutlineGithub } from "react-icons/ai";
import { FiChevronRight } from "react-icons/fi";

import Aos from "aos";
import "aos/dist/aos.css";
const Footer = () => {
  useEffect(() => {
    Aos.init({ duration: 2000 });
  });

  useEffect(() => {
    updateCopyrightYear();
  }, []);

  const updateCopyrightYear = () => {
    const currentYear = new Date().getFullYear();
    const copyrightElement = document.getElementById("copyright");
    if (copyrightElement) {
      copyrightElement.textContent = `© ${currentYear} Your Company. All rights reserved.`;
    }
  };

  return (
    <section data-aos="fade-up" className="footer">
      <div className="videoDiv">
        <video src={video2} loop autoPlay muted type="video/mp4"></video>
      </div>

      <div className="secContent container">
        <div data-aos="fade-up" className="contactDiv flex">
          <div className="text">
            <small>Keep in touch</small>
            <h2>Travel with us</h2>
          </div>

          <div data-aos="fade-up" className="inputDiv flex">
            <input type="text" placeholder="Enter your Email Address" />
            <button data-aos="fade-up" className="btn flex">
              <FiSend className="icon" />
            </button>
          </div>
        </div>

        <div className="footerCard flex">
          <div className="footerIntro flex">
            <div className="logoDiv">
              <a href="#" className="logo flex">
                <MdTravelExplore className="icon" /> TravelNest.
              </a>
            </div>

            <div data-aos="fade-up" className="footerParagraph">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatibus provident earum libero, nemo, distinctio fugiat quam
              blanditiis tempora, veniam cumque quas asperiores numquam iure.
              Dicta aut minima voluptate placeat voluptatum.
            </div>

            <div data-aos="fade-up" className="footerSocials flex">
              <BiLogoFacebookCircle className="icon" />
              <AiFillInstagram className="icon" />
              <FcReddit className="icon" />
              <AiFillTwitterCircle className="icon" />
              <AiOutlineGithub className="icon" />
            </div>
          </div>

          <div className="footerLinks grid">
            {/* Group 1 */}
            <div
              data-aos="fade-up"
              data-aos-duration="3000"
              className="linkGroup"
            >
              <span className="groupTitle">Our Agency</span>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Service
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Insurance
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Agency
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Tourism
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Payment
              </li>
            </div>
            {/* Group 2*/}
            <div
              data-aos="fade-up"
              data-aos-duration="4000"
              className="linkGroup"
            >
              <span className="groupTitle">Partner</span>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Bookings
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Rentcars
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Hostelworld
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Trivago
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                TripAdvisor
              </li>
            </div>
            {/* Group 3 */}
            <div
              data-aos="fade-up"
              data-aos-duration="5000"
              className="linkGroup"
            >
              <span className="groupTitle">Last Minute</span>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Asia
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Europe
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Africa
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Americas
              </li>

              <li className="footerList flex">
                <FiChevronRight className="icon" />
                Australia
              </li>
            </div>
          </div>

          <div className="footerDiv flex">
            <small id="copyright">© Your Company. All rights reserved.</small>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Footer;
