import React from "react";
import { Container, Row, Col, Button } from "reactstrap";
import { Link } from "react-router-dom";
import 'animate.css';

import "../styles/thank-you.css";
const ThankYou = () => {
  return (
    <section>
      <Container>
        <Row>
          <Col lg="12" className="pt-5 text-center animate__animated animate__heartBeat">
            <div className="thank__you">
              <span>
                <i class="ri-checkbox-circle-line"></i>
                <h1 className="mb-3 fw-semibold">Thank You !!!</h1>
                <h3 className="mb-4">You have placed successfully.</h3>

                <Button className="btn primary__btn w-25">
                  <Link to="/home">Back to Home</Link>
                </Button>
              </span>
            </div>
          </Col>
        </Row>
      </Container>
    </section>
  );
};

export default ThankYou;
