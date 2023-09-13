import React from "react";
import Slider from "react-slick";
import ava01 from "../../assets/images/ava-01.jpg";
import ava02 from "../../assets/images/ava-02.jpg";
import ava03 from "../../assets/images/ava-03.jpg";

const Testimonials = () => {
  const settings = {
    dots: true,
    infinite: true,
    autoplay: true,
    swipeToSlide: true,
    autoplaySpeed: 2000,
    slidesToShow: 4,

    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesScroll: 1,
          infinite: true,
          dots: true,
        },
      },

      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesScroll: 1,
        },
      },
    ],
  };
  return (
    <Slider {...settings}>
      <div className="testimonial py-4 px-3">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique,
          reiciendis adipisci sed nisi, reprehenderit maxime fugit et eos fugiat
          nulla placeat ex alias dicta magni at aspernatur aliquam vel. Quasi.
        </p>
        <div className="d-flex align-items-center gap-4 mt-3">
          <img src={ava01} className="w-25 h-25 rounded-2" alt="" />
          <div>
            <h6 className="mb-0 mt-3">Xiao My</h6>
            <p>Customer</p>
          </div>
        </div>
      </div>

      <div className="testimonial py-4 px-3">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique,
          reiciendis adipisci sed nisi, reprehenderit maxime fugit et eos fugiat
          nulla placeat ex alias dicta magni at aspernatur aliquam vel. Quasi.
        </p>
        <div className="d-flex align-items-center gap-4 mt-3">
          <img src={ava02} className="w-25 h-25 rounded-2" alt="" />
          <div>
            <h6 className="mb-0 mt-3">Alan</h6>
            <p>Customer</p>
          </div>
        </div>
      </div>

      <div className="testimonial py-4 px-3">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique,
          reiciendis adipisci sed nisi, reprehenderit maxime fugit et eos fugiat
          nulla placeat ex alias dicta magni at aspernatur aliquam vel. Quasi.
        </p>
        <div className="d-flex align-items-center gap-4 mt-3">
          <img src={ava03} className="w-25 h-25 rounded-2" alt="" />
          <div>
            <h6 className="mb-0 mt-3">Jenny</h6>
            <p>Customer</p>
          </div>
        </div>
      </div>

      <div className="testimonial py-4 px-3">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique,
          reiciendis adipisci sed nisi, reprehenderit maxime fugit et eos fugiat
          nulla placeat ex alias dicta magni at aspernatur aliquam vel. Quasi.
        </p>
        <div className="d-flex align-items-center gap-4 mt-3">
          <img src={ava03} className="w-25 h-25 rounded-2" alt="" />
          <div>
            <h6 className="mb-0 mt-3">Jenny</h6>
            <p>Customer</p>
          </div>
        </div>
      </div>

      <div className="testimonial py-4 px-3">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique,
          reiciendis adipisci sed nisi, reprehenderit maxime fugit et eos fugiat
          nulla placeat ex alias dicta magni at aspernatur aliquam vel. Quasi.
        </p>
        <div className="d-flex align-items-center gap-4 mt-3">
          <img src={ava03} className="w-25 h-25 rounded-2" alt="" />
          <div>
            <h6 className="mb-0 mt-3">Jenny</h6>
            <p>Customer</p>
          </div>
        </div>
      </div>
    </Slider>
  );
};

export default Testimonials;
