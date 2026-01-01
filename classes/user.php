<?php
class User 
{
    protected int $id;
    protected string $nom;
    protected string $email;
    protected string $motDePasse;
    protected string $role;
    protected $db;

    public function __construct($id, $nom, $email, $motDePasse, $role = 'client', $db){
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $emil ;
        $this->motDePasse = $motDePasse;
        $this->role = $role;
        $this->db = $db;
    }

    public function seConnecter($email, $motDePasse ){
        return $this->authentifier($email, $motDePasse );
    }

    protected function authentifier($email, $motDePasse)
    {
        // preparer la requette sql
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);

        // exécuter avec la valeur
        $stmt->execute([
            'email' => $email
        ]);

        // récupérer l’utilisateur
        $user = $stmt->fetch();

        // vérifier si l’utilisateur existe
        if (!$user) {
            return false; 
        }

        // vérifier le mot de passe
        if (!password_verify($motDePasse, $user['mot_de_passe'])) {
            return false; 
        }

        // connexion réussie créer la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        return true;
    }
}