import React from 'react';
import './app.css'
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import HomeComponent from './views/pages/HomeComponent';
import AdminComponent from './views/admin/AdminComponent';
import LoginAdmin from './views/auth/LoginAdmin';
import Login from './views/auth/Login';
import Register from './views/auth/Register';

function App() {
  return (
    <Router>
      <Switch>
        <Route path="/" exact component={HomeComponent} />
        <Route path="/admin" component={AdminComponent} />
        <Route path="/login-admin" component={LoginAdmin} />
        <Route path="/login" component={Login} />
        <Route path="/register" component={Register} />
      </Switch>
    </Router>
  );
}

export default App;
