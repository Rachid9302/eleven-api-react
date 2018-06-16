import React, { Component } from 'react';
import axios from 'axios';


class AstronautesShow extends Component{
    state = {
        astronautes: []
    }

    componentDidMount(){
        axios.get("http://localhost/eleven-api/web/app_dev.php/astronautes")
            .then(res => {
                const astronautes = res.data;
                this.setState({astronautes})
            })
    }
    render(){
        return (
            <div>
                <h1>Liste des astronautes</h1>
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                    {this.state.astronautes.map((astronaute) =>
                        <tr>
                            <td>{astronaute.nom}</td>
                            <td>{astronaute.prenom}</td>
                            <td>{astronaute.age}</td>
                        </tr>
                    )}

                    </tbody>
                </table>
            </div>
        )
    }
}

export default AstronautesShow;