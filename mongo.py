from pymongo import MongoClient


client = MongoClient("mongodb://localhost:27017/")
db = client["emp"]
carte_acces = db["carte_acces"]

grade = ""
def grade_employe():
    #récuperer nom prénom employé et grade du badge d'accès
    #pseu
    while True:
        print("1 - employé")
        print("2 - cadre")
        print("3 - directeur")
        print("4 - patron")
        
        #choix
        saisie_grade = input("Entrez le grade de l'employé : ")
        #vérifier si c'est un nombre
        if saisie_grade.isdigit():
            grade = int(saisie_grade)
            if grade >=1 and grade <=4:
                if grade == 1:
                    grade = "employé"
                    return grade
                if grade == 2:
                    grade = "cadre"
                    return grade
                if grade == 3:
                    grade = "directeur"
                    return grade
                if grade == 4:
                    grade = "patron"
                    return grade
            print("Veuillez entrer un nombre entre 1 et 4.")
            True
        True
def ajouter_employes():
    grade =grade_employe()
    while True:
        saisie_prenoms = input("Entrez un prénom : ")
        #vérifier si c'est une chaine de caractères
        if saisie_prenoms.isalpha():
            saisie_prenoms = str(saisie_prenoms)
            saisie_noms = input("Entrez un nom : ")
            if saisie_noms.isalpha():
                saisie_noms = str(saisie_noms)
                employe = [{"grade": grade, "prenom": saisie_prenoms, "nom": saisie_noms},]
                carte_acces.insert_many(employe)
                print("Employé ajouté avec succès !")
                return employe , saisie_prenoms, saisie_noms



def supprimer_employes():
    tout_les_employes = carte_acces.find()
    print("".join([" prenom:"+employe['prenom']+" nom:"+employe['nom']+" grade: "+employe['grade']+"\n" for employe in tout_les_employes]))
    prenom_a_supprimer = input("Entrez le prénom de l'employé à supprimer : ").strip()
    nom_a_supprimer = input("Entrez le nom de l'employé à supprimer : ").strip()

    if not prenom_a_supprimer or not nom_a_supprimer:
        print("Suppression annulée : le prénom et le nom sont obligatoires.")
        return

    resultat = carte_acces.delete_one({"prenom": prenom_a_supprimer, "nom": nom_a_supprimer})
    if resultat.deleted_count == 1:
        print("Employé supprimé avec succès !")
    else:
        print("Aucun employé trouvé avec ce prénom et ce nom.")


def main():
    print("1 - Ajouter un employé")
    print("2 - Supprimer un employé")
    choix = input("Entrez votre choix : ")
    if choix == "1":
        ajouter_employes()
    elif choix == "2":
        supprimer_employes()

main()
