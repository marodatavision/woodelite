import React from 'react';
import ReactDOM from 'react-dom';
import AppRouter from './components/AppRouter';

function App() {
    return (
        <div className="min-h-screen bg-gray-100">
            <AppRouter />
        </div>
    );
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}