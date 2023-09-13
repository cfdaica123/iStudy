import React from "react";
import Masonry, { ResponsiveMasonry } from "react-responsive-masonry";
import galleryImages from "./galleryImages";
const MasonryImagesGallery = () => {
  const getRandomAosEffect = () => {
    const randomIndex = Math.floor(Math.random() * 2); // Tạo số ngẫu nhiên từ 0 đến 1
    return randomIndex === 0 ? "fade-left" : "fade-right";
  };
  return (
    <ResponsiveMasonry columnsCountBreakPoints={{ 768: 4, 992: 4 }}>
      <Masonry gutter="1rem">
        {galleryImages.map((item, index) => (
          <img
            className="masonry__img"
            src={item}
            key={index}
            style={{ width: "100%", display: "block", borderRadius: "10px" }}
            alt=""
            data-aos={getRandomAosEffect()}
            data-aos-offset="200"
          />
        ))}
      </Masonry>
    </ResponsiveMasonry>
  );
};

export default MasonryImagesGallery;
