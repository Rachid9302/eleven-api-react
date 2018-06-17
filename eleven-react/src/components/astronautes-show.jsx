import React, { Component } from 'react';
import axios from 'axios';


class AstronautesShow extends Component{

    state = {
        astronautes: []
    }

    // récupération de tous les astronautes grâce à l'url de l'api symfony
    componentDidMount(){
        axios.get("http://localhost/eleven-api-react/eleven-api/web/app_dev.php/astronautes")
            .then(res => {
                const astronautes = res.data;
                this.setState({astronautes});
            })
    }
    render(){
        var contenu = '';

        // affichage des astronautes dans le tableau
        if(this.state.astronautes.length){
            contenu = this.state.astronautes.map((astronaute) =>
                <tr>
                    <td>{astronaute.nom.toUpperCase()}</td>
                    <td>{astronaute.prenom}</td>
                    <td>{astronaute.age}</td>
                </tr>
            )
        }else {
            contenu = <tr><td colSpan="3" className="text-center">Aucune donnée n'existe</td></tr>
        }
        return (
            <div>
                <h1>Liste des astronautes</h1>
                <table className="table table-bordered ">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        {contenu}
                    </tbody>
                </table>
            </div>
        )
    }
}

export default AstronautesShow;