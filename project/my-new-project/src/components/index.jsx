import React from 'react';
import Navbar from "./navbar/Navbar";
import Home from "./home/Home";
import Main from "./main/Main";
import Footer from "./footer/Footer";

const index = () => {
  return (
    <>
      <Navbar />
      <Home />
      <Main />
      <Footer/>
    </>
  )
}

export default index