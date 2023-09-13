import React from "react";
import "./newsletter.css";

import { Container, Row, Col } from "reactstrap";
import maleTourist from "../assets/images/male-tourist.jpg";

const Newsletter = () => {
  return (
    <section className="newsletter" data-aos="fade-up">
      <Container>
        <Row>
          <Col lg="6">
            <div className="newsletter__content">
              <h2>Subscribe now to get useful traveling information.</h2>

              <div className="newsletter__input">
                <input type="email" placeholder="Enter your mail" />
                <button className="btn newsletter__btn">Subscribe</button>
              </div>

              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi,
                maiores rem? Unde tempora fugiat voluptate culpa, debitis quod,
                est, libero maxime aliquid cupiditate laborum fuga impedit
                perferendis omnis ipsam sit!
              </p>
            </div>
          </Col>
          <Col lg="6">
            <div className="newsletter__img">
              <img src={maleTourist} alt="" />
            </div>
          </Col>
        </Row>
      </Container>
    </section>
  );
};

export default Newsletter;
