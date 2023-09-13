import React from "react";
import ServiceCard from "./ServiceCard";
import { Col } from "reactstrap";

import weatherImg from "../assets/images/weather.png";
import guideImg from "../assets/images/guide.png";
import customizationImg from "../assets/images/customization.png";

const servicesData = [
  {
    imgUrl: weatherImg,
    title: "Calculate weather",
    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum aliquam voluptatem quas laborum! Nam fuga fugiat rem molestiae dolorum perferendis eaque aspernatur esse? Tenetur labore odit, doloremque cupiditate magnam nostrum.",
  },

  {
    imgUrl: guideImg,
    title: "Best Tour Guide",
    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum aliquam voluptatem quas laborum! Nam fuga fugiat rem molestiae dolorum perferendis eaque aspernatur esse? Tenetur labore odit, doloremque cupiditate magnam nostrum.",
  },

  {
    imgUrl: customizationImg,
    title: "Customization",
    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum aliquam voluptatem quas laborum! Nam fuga fugiat rem molestiae dolorum perferendis eaque aspernatur esse? Tenetur labore odit, doloremque cupiditate magnam nostrum.",
  },
];

const ServiceList = () => {
  return (
    <>
      {servicesData.map((item, index) => (
        <Col lg="3" key={index} data-aos="fade-up">
          <ServiceCard item={item} />
        </Col>
      ))}
    </>
  );
};

export default ServiceList;
