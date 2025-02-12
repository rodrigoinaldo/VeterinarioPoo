/*testando o banco*/
--select cd_animal, nm_animal, cd_especie from Animal

/*segundo teste*/
--SELECT animal.cd_animal, animal.nm_animal, especie.cd_especie , especie.nm_especie FROM animal INNER JOIN especie ON animal.cd_especie = especie.cd_especie
    
/*teçeiro teste*/
-- SELECT cd_animal, nm_animal, cd_especie FROM animal WHERE nm_animal = 'LUNA'

-- quarto teste
--SELECT * FROM `animal` WHERE cd_animal = 1;