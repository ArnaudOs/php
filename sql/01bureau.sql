-- La liste des bureaux (adresse et ville) triés par pays décroissant puis par état
SELECT addressLine1,addressLine2,city 
FROM offices 
ORDER BY country DESC, state DESC


-- La liste des avions (code et nom) triés par vendeur et par quantité en stock décroissants
SELECT productCode,productVendor,productName,quantityInStock 
FROM `products`WHERE productLine="Planes" 
ORDER BY productVendor, quantityInStock DESC


-- La liste des produits (nom, vendeur et prix de vente) qui sont vendus au moins 132$ triés par nom du produit
SELECT productName,productVendor,MSRP 
FROM `products`WHERE MSRP>=132 
ORDER BY productName

-- La liste des produits (code, nom, échelle et quantité) qui ont une échelle soit de 1:10, soit de 1:18 triés par quantité en stock décroissante
SELECT productCode,productName,quantityInStock,productScale 
FROM `products`WHERE productScale="1:10" OR productScale="1:18" 
ORDER BY quantityInStock DESC

-- La liste des produits (code, nom et prix d'achat) des produits achetés au moins 60$ au plus 90$ triés par prix d'achat
SELECT productCode,productName,buyPrice 
FROM `products`WHERE buyPrice >="60" 
AND buyPrice <="90" ORDER BY buyPrice

-- La liste des motos (nom, vendeur, quantité et marge) triés par marge décroissante
SELECT productName, productVendor, quantityInStock, (MSRP-buyPrice) 
FROM products WHERE productLine="Motorcycles" ORDER BY (MSRP-buyPrice)

-- La liste des commandes (numéro de commande, date de commande, date d'expédition, écart en jours entre la date de commande et la date d'expédition, statut de la commande) soit qui sont en cours de traitement, soit qui ont été expédiées plus de 10 jours après la date de commande triés par écart décroissant puis par date de commande
SELECT orderNumber, orderDate, shippedDate, DATEDIFF(shippedDate, orderDate) AS delais  
FROM orders WHERE status="in process" OR (status="shipped" AND DATEDIFF(shippedDate, orderDate)) 
ORDER BY DATEDIFF(shippedDate, orderDate) DESC
-- on remplace le nom d'une colonne  AS quelque chose

-- La liste des produits (nom et valeur du stock à la vente) des années 1960
SELECT productName, quantityInStock*buyPrice AS ValeurInstockVente 
FROM `products` WHERE productName like"196%"

-- Le prix moyen d'un produit vendu par chaque vendeur triés par prix moyen décroissant
SELECT AVG(buyPrice) AS moyenne, MAX(buyPrice) AS maximum, MIN(buyPrice)AS minimum, productVendor AS fournisseur FROM products GROUP BY productVendor ORDER BY moyenne DESC

-- Le nombre de produits pour chaque ligne de produit
SELECT  productLine, SUM(quantityInStock) FROM `products`GROUP BY productLine

-- Le total du stock et le total de la valeur du stock à la vente de chaque ligne de produit pour les produits vendus plus de 100$ trié par total de la valeur du stock à la vente
SELECT productLine, SUM(quantityInStock) AS quantity, SUM(quantityInStock*MSRP) AS stockValue FROM `products` WHERE msrp>100 GROUP BY productLine ORDER BY SUM(quantityInStock*MSRP)

-- La quantité du produit le plus en stock de chaque vendeur trié par vendeur
SELECT MAX(quantityinstock),productVendor FROM `products`GROUP BY productVendor ORDER BY productVendor


-- //LA PROPRIÉTÉ JOIN ENTRE LE FROM ET LE WHERE
SELECT products.productCode, products.productName, quantityOrdered, priceEach, (quantityOrdered*priceEach) AS TOTAL 
FROM `orderdetails` 
JOIN products ON products.productCode=orderdetails.productCode
WHERE`orderNumber`=10107


-- //pour joindre deux tables orders et customers liés par le customernumber. Le ON relie les deux avec le ON
SELECT o.orderNumber, o.status, o.orderDate, o.shippedDate, c.customerName 
FROM orders AS o JOIN customers AS c ON o.customerNumber = c.customerNumber


-- on peut faire plusieurs jointures à la suite
SELECT o.orderNumber, o.status, o.orderDate, o.shippedDate, c.customerName, c.contactFirstName, c.contactLastName, e.firstName, e.lastName, of.city, ROUND(SUM((od.quantityOrdered * od.priceEach)), 2) AS montant
FROM orders AS o
JOIN orderdetails AS od ON o.orderNumber = od.orderNumber
JOIN customers AS c ON o.customerNumber = c.customerNumber
JOIN employees AS e ON c.salesRepEmployeeNumber = e.employeeNumber
JOIN offices AS of ON e.officeCode = of.officeCode
GROUP BY o.orderNumber  
ORDER BY o.orderDate DESC

SELECT productCode, quantityOrdered, priceEach, (quantityOrdered*priceEach) AS TOTAL FROM `orderdetails`  WHERE`orderNumber`=10107
