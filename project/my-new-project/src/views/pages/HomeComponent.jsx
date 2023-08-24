import React from 'react';
import Navbar from "../../components/template/navbar/Navbar";
import Home from "../../components/template/home/Home";
import Main from "../../components/template/main/Main";
import Footer from "../../components/template/footer/Footer";

const HomeComponent = () => {
  return (
    <>
      <Navbar />
      <Home />
      <Main />
      <Footer/>
    </>
  )
}

export default HomeComponent