import React from 'react';
import './app.css'
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import index from './components';
import admin from './admin/Admin';
import LoginAdmin from './auth/admins/Login';
import Login from './auth/users/Login';
import Register from './auth/users/Register';

function App() {
  return (
    <Router>
      <Switch>
        <Route path="/" exact component={index} />
        <Route path="/admin" component={admin} />
        <Route path="/login-admin" component={LoginAdmin} />
        <Route path="/login" component={Login} />
        <Route path="/register" component={Register} />
      </Switch>
    </Router>
  );
}

export default App;
