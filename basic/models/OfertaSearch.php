<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Oferta;

/**
 * OfertaSearch represents the model behind the search form of `app\models\Oferta`.
 */
class OfertaSearch extends Oferta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idferta', 'puestosVacantes', 'empresa_idempresa'], 'integer'],
            [['titulo', 'descripcion', 'tiempoContratacion', 'nivelExperiencia', 'genero', 'salarioMInimo', 'salarioMaximo', 'escolaridad'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Oferta::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idferta' => $this->idferta,
            'puestosVacantes' => $this->puestosVacantes,
            'empresa_idempresa' => $this->empresa_idempresa,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'tiempoContratacion', $this->tiempoContratacion])
            ->andFilterWhere(['like', 'nivelExperiencia', $this->nivelExperiencia])
            ->andFilterWhere(['like', 'genero', $this->genero])
            ->andFilterWhere(['like', 'salarioMInimo', $this->salarioMInimo])
            ->andFilterWhere(['like', 'salarioMaximo', $this->salarioMaximo])
            ->andFilterWhere(['like', 'escolaridad', $this->escolaridad]);

        return $dataProvider;
    }
}
