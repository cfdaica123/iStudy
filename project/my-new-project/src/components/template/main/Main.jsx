/* eslint-disable no-undef */
import React, { useEffect } from "react";
import "./main.css";
import { GrLocation } from "react-icons/gr";
import { BsClipboardCheck } from "react-icons/bs";
import img from "../../../Assets/img (1).jpg";

import Aos from "aos";
import "aos/dist/aos.css";

const Data = [
  {
    id: 1,
    imgSrc: img,
    destTitle: "Bora bora",
    location: "New zeeland",
    grade: "cultural relax",
    fees: "$700",
    description:
      "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt error eligendi, tempore, magnam, eveniet dolorum laboriosam ipsam doloremque voluptatum quod quisquam et quia explicabo mollitia eius quas sint libero nostrum.",
  },

  {
    id: 2,
    imgSrc: img,
    destTitle: "Bora bora",
    location: "New zeeland",
    grade: "cultural relax",
    fees: "$700",
    description:
      "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt error eligendi, tempore, magnam, eveniet dolorum laboriosam ipsam doloremque voluptatum quod quisquam et quia explicabo mollitia eius quas sint libero nostrum.",
  },

  {
    id: 3,
    imgSrc: img,
    destTitle: "Bora bora",
    location: "New zeeland",
    grade: "cultural relax",
    fees: "$700",
    description:
      "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt error eligendi, tempore, magnam, eveniet dolorum laboriosam ipsam doloremque voluptatum quod quisquam et quia explicabo mollitia eius quas sint libero nostrum.",
  },

  {
    id: 4,
    imgSrc: img,
    destTitle: "Bora bora",
    location: "New zeeland",
    grade: "cultural relax",
    fees: "$700",
    description:
      "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt error eligendi, tempore, magnam, eveniet dolorum laboriosam ipsam doloremque voluptatum quod quisquam et quia explicabo mollitia eius quas sint libero nostrum.",
  },

  {
    id: 5,
    imgSrc: img,
    destTitle: "Bora bora",
    location: "New zeeland",
    grade: "cultural relax",
    fees: "$700",
    description:
      "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt error eligendi, tempore, magnam, eveniet dolorum laboriosam ipsam doloremque voluptatum quod quisquam et quia explicabo mollitia eius quas sint libero nostrum.",
  },
];

const Main = () => {
  useEffect(() => {
    Aos.init({ duration: 2000 });
  });

  return (
    <section className="main container section">
      <div data-aos="fade-right" className="secTitle">
        <h3 className="title">Most visited destinations</h3>
      </div>

      <div className="secContent grid">
        {Data.map(
          ({ id, imgSrc, destTitle, location, grade, fees, description }) => {
            return (
              <div key={id} data-aos="fade-up" className="singleDestination">
                <div className="imageDiv">
                  <img src={imgSrc} alt={destTitle} />
                </div>

                <div className="cardInfo">
                  <h4 className="destTitle">{destTitle}</h4>
                  <span className="continent flex">
                    <GrLocation className="icon" />
                    <span className="name">{location}</span>
                  </span>
                  <div className="fees flex">
                    <div className="grade">
                      <span>
                        {grade}
                        <small>+1</small>
                      </span>
                    </div>
                    <div className="price">
                      <h5>{fees}</h5>
                    </div>
                  </div>
                  <div className="desc">
                    <p>{description}</p>
                  </div>
                  <button className="btn flex">
                    Detail <BsClipboardCheck className="icon" />
                  </button>
                </div>
              </div>
            );
          }
        )}
      </div>
    </section>
  );
};

export default Main;
