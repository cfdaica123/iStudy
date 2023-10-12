import React from "react";
import { Routes, Route } from "react-router-dom";
import Home from "../pages/Home";
import Tours from "../pages/Tour";
import TourDetails from "../pages/TourDetails";
import Login from "../pages/Login";
import Register from "../pages/Register";
import SearchResuiltList from "../pages/SearchResuiltList";
import ThankYou from "../pages/ThankYou";

const AppRouter = () => {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/home" element={<Home />} />
      <Route path="/tours" element={<Tours />} />
      <Route path="/tours/:id" element={<TourDetails />} />
      <Route path="/login" element={<Login />} />
      <Route path="/register" element={<Register />} />
      <Route path="/thank-you" element={<ThankYou />} />
      <Route path="/tours/search" element={<SearchResuiltList />} />
    </Routes>
  );
};

export default AppRouter;
