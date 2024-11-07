#!/bin/bash

if [ -z "$DB_SCHEMA" ]; then
  echo "The environment variable DB_SCHEMA is not defined. It will use 'uex-schema'."
  DB_SCHEMA="uex-schema"
fi

psql -U "$POSTGRES_USER" -d "$POSTGRES_DB" -c "CREATE SCHEMA IF NOT EXISTS \"$DB_SCHEMA\";"
