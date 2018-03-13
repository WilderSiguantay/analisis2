<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Postulantes;

/**
 * PostulantesSearch represents the model behind the search form of `app\models\Postulantes`.
 */
class PostulantesSearch extends Postulantes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPostulantes', 'candidato_idcandidato'], 'integer'],
            [['detalleOferta_idDetalleOferta'], 'safe'],
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
        $query = Postulantes::find();

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
            'idPostulantes' => $this->idPostulantes,
            'candidato_idcandidato' => $this->candidato_idcandidato,
        ]);

        $query->andFilterWhere(['like', 'detalleOferta_idDetalleOferta', $this->detalleOferta_idDetalleOferta]);

        return $dataProvider;
    }
}
