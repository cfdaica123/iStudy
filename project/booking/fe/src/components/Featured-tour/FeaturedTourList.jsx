import React from "react";
import TourCard from "../../shared/TourCard";
import tourData from "../../assets/data/tours";
import { Col } from "reactstrap";

const FeaturedTourList = () => {
  const getRandomAosEffect = () => {
    const randomIndex = Math.floor(Math.random() * 2); // Tạo số ngẫu nhiên từ 0 đến 1
    return randomIndex === 0 ? "fade-left" : "fade-right";
  };

  return (
    <>
      {tourData?.map((tour) => (
        <Col
          lg="3"
          className="mb-4"
          key={tour.id}
          data-aos={getRandomAosEffect()}
        >
          <TourCard tour={tour} />
        </Col>
      ))}
    </>
  );
};

export default FeaturedTourList;
