import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    componentDidMount() {
        console.log(user_id)
        axios.get('/api/user').then(resp => console.log(resp.data))
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">
                                I'm an example component!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('root-tes')) {
    ReactDOM.render(<Example />, document.getElementById('root-test'));
}
