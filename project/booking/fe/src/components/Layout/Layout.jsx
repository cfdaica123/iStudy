import React from 'react'
import Header from '../Header/Header'
import AppRouter from "./../../router/Router"
import Footer from '../Footer/Footer'
const Layout = () => {
  return (
    <>
      <Header />
      <AppRouter />
      <Footer />
    </>
  )
}

export default Layout