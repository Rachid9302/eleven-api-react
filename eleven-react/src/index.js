import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import AstronautesShow from './components/astronautes-show';
import AstronauteNew from './components/astronaute-new';
import registerServiceWorker from './registerServiceWorker';

ReactDOM.render(<AstronautesShow />, document.getElementById('astronautes-show'));
ReactDOM.render(<AstronauteNew />, document.getElementById('astronaute-new'));
registerServiceWorker();
