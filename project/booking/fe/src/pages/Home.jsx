/* eslint-disable jsx-a11y/heading-has-content */
import React, { useEffect } from "react";
import "../styles/home.css";

import { Container, Row, Col } from "reactstrap";
import heroImg from "../assets/images/hero-img01.jpg";
import heroImg02 from "../assets/images/hero-img02.jpg";
import heroVideo from "../assets/images/hero-video.mp4";
import worldImg from "../assets/images/world.png";
import experienceImg from "../assets/images/experience2.png";

import Subtitle from "../shared/Subtitle";

import SearchBar from "../shared/SearchBar";
import ServiceList from "../services/ServiceList";
import FeaturedTourList from "../components/Featured-tour/FeaturedTourList";
import MasonryImagesGallery from "../components/Image-gallery/MasonryImagesGallery";
import Testimonials from "../components/Testimonial/Testimonials";
import Newsletter from "../shared/Newsletter";

import Aos from "aos";
import "aos/dist/aos.css";
const Home = () => {
  useEffect(() => {
    Aos.init({ duration: 2000 });
  });


  return (
    <>
      {/* hero section */}
      <section data-aos="fade-down">
        <Container>
          <Row>
            <Col lg="6">
              <div className="hero__content">
                <div className="hero__subtitle d-flex align-items-center">
                  <Subtitle subtitle={"Know Before You Go"} />
                  <img src={worldImg} alt="" />
                </div>
                <h1>
                  Traveling open the door to creating{""}
                  <span className="highlight"> memories</span>
                </h1>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Voluptatum optio minima doloribus vitae facere. Aut,
                  voluptatem earum. Repellat voluptatibus delectus, corporis
                  quisquam omnis quia ut, accusantium fugit, beatae obcaecati
                  fugiat?
                </p>
              </div>
            </Col>

            <Col lg="2" data-aos="fade-left">
              <div className="hero__img-box">
                <img src={heroImg} alt="" />
              </div>
            </Col>

            <Col lg="2" data-aos="fade-down">
              <div className="hero__img-box mt-4">
                <video src={heroVideo} controls loop autoPlay muted alt="" />
              </div>
            </Col>

            <Col lg="2" data-aos="fade-right">
              <div className="hero__img-box mt-5">
                <img src={heroImg02} alt="" />
              </div>
            </Col>
            <SearchBar />
          </Row>
        </Container>
      </section>

      <section  data-aos="fade-right">
        <Container>
          <Row>
            <Col lg="3">
              <h5 className="services__subtitle" data-aos="fade-down">What we serve</h5>
              <h2 className="services__title">We offer our best services</h2>
            </Col>
            <ServiceList />
          </Row>
        </Container>
      </section>

      {/* featured tour section */}
      <section>
        <Container>
          <Row>
            <Col lg="12" className="mb-5"  data-aos="fade-right">
              <Subtitle subtitle={"Explore"} />
              <h2 className="featured__tour-title"  data-aos="fade-up">Our feature tours</h2>
            </Col>
            <FeaturedTourList />
          </Row>
        </Container>
      </section>

      {/* experience section */}
      <section data-aos-offset="200">
        <Container>
          <Row>
            <Col lg="6">
              <div className="experience__content" data-aos="fade-down">
                <Subtitle subtitle={"Experience"} />

                <h2 data-aos="fade-right" >
                  With our all Experience <br /> We will serve you
                </h2>
                <p data-aos="fade-left">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Blanditiis, cupiditate voluptas alias hic eligendi aut
                  explicabo ipsum rerum doloremque voluptate, repellat ipsa
                  tenetur provident temporibus soluta consequatur. Commodi,
                  doloremque dolores.
                </p>

                <div className="counter__wrapper d-flex align-items-center gap-5" data-aos="fade-down">
                  <div className="counter__box">
                    <span>12k+</span>
                    <h6>Successful trip</h6>
                  </div>
                  <div className="counter__box">
                    <span>2k+</span>
                    <h6>Regular client</h6>
                  </div>
                  <div className="counter__box">
                    <span>12</span>
                    <h6>Year Experience</h6>
                  </div>
                </div>
              </div>
            </Col>
            <Col lg="6">
              <div className="experience__img" data-aos="fade-left">
                <img src={experienceImg} alt="" />
              </div>
            </Col>
          </Row>
        </Container>
      </section>

      {/* gallery section */}
      <section>
        <Container>
          <Row>
            <Col lg="12" data-aos="fade-down">
              <Subtitle subtitle={"Gallery"} />
              <h2 className="gallery__title">Discover Resort Amenities</h2>
            </Col>
            <Col lg="12">
              <MasonryImagesGallery />
            </Col>
          </Row>
        </Container>
      </section>

      {/* testimonial section */}
      <section data-aos="fade-down">
        <Container>
          <Row>
            <Col lg="12">
              <Subtitle subtitle={"Fans Love"} />
              <h2 className="testimonial__title">What our fans say about us</h2>
            </Col>
            <Col lg="12">
              <Testimonials />
            </Col>
          </Row>
        </Container>
      </section>

      <Newsletter />
    </>
  );
};

export default Home;
