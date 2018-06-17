import React, { Component } from 'react';
import axios from 'axios';


class AstronauteNew extends Component{
    // initialisation des attributs d'un astronaute
    state = {
        nom: '',
        prenom: '',
        age: 0
    };

    // on set les valeurs saisie
    handleChange = event => {
        this.setState({
            nom: event.target.value.nom,
            prenom: event.target.value.prenom,
            age: event.target.value.age
        });
    };

    // création d'un nouvelle astronaute et on associe a l'astronaute les valeurs setter précédemment
    handleSubmit = event => {
        event.preventDefault();
        const astronaute = {
            nom: this.state.nom,
            prenom: this.state.prenom,
            age: this.state.age
        };


        // on envoie l'objet astronaute en parametre à l'url de l'api
        axios.post('http://localhost/eleven-api-react/eleven-api/web/app_dev.php/new-astronaute', astronaute)
            .then(res =>{
                console.log(res);
                console.log(res.data);
            })
    };

    render(){
        return (
            <div>
                <h1>Ajouter un nouvel astronaute</h1>
                <form onSubmit={this.handleSubmit}>
                    <div className="form-group">
                        <label className="control-label">Nom</label>
                        <input type="text" name="nom" className="form-control" onChange={this.handleChange}/>
                    </div>
                    <div className="form-group">
                        <label className="control-label">Prenom</label>
                        <input type="text" name="prenom" className="form-control" onChange={this.handleChange}/>
                    </div>
                    <div className="form-group">
                        <label className="control-label">Age</label>
                        <input type="number" name="age" className="form-control" onChange={this.handleChange}/>
                    </div>
                    <button type="submit" className="btn btn-primary btn-lg btn-block">Ajouter</button>
                </form>
            </div>
        )
    }
}

export default AstronauteNew;